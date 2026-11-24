<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\AdminBulkUserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminBulkUserStoreController extends Controller
{
    public function __invoke(AdminBulkUserCreateRequest $request)
    {
        $handle = fopen($request->file('csv_file')->getRealPath(), 'r');
        $header = array_map(fn ($col) => strtolower(trim($col)), fgetcsv($handle));

        $errors = [];
        $validRows = [];
        $seen = [];

        while (($row = fgetcsv($handle)) !== false) {
            $data = array_combine($header, $row);

            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'regex:/^[\pL\s\-]+$/u'],
                'student_number' => ['required', 'numeric', 'digits:8', 'unique:users,student_number'],
            ]);

            if ($validator->fails()) {
                $errors[] = ['row' => $data, 'errors' => $validator->errors()->all()];
                continue;
            }
            
            if (in_array($data['student_number'], $seen)) {
                $errors[] = ['row' => $data, 'errors' => ['Duplicate student number within this file.']];
                continue;
            }
            $seen[] = $data['student_number'];

            $validRows[] = $data;
        }

        fclose($handle);

        $rowsToInsert = [];
        foreach($validRows as $data){
            $rowsToInsert[] =[
                'name' => $data['name'],
                'email' => $data['student_number'] . '@tafe.wa.edu.au',
                'student_number' => $data['student_number'],
                'password' => bcrypt(Str::random(32)),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        try {
            DB::transaction(function () use ($rowsToInsert) {
                User::insert($rowsToInsert);
            });
        } catch (\Illuminate\Database\UniqueConstraintViolationException $e) {
            return redirect()->route('admin.users.bulk-create')
                ->with('status', 'Import failed: one or more student numbers already exist. No accounts were created.');
        }

        foreach ($rowsToInsert as $userData) {
            Password::sendResetLink(['email' => $userData['email']]);
        }

        return redirect()->route('admin.users.bulk-create')
            ->with('status', count($rowsToInsert) . ' users created.')
            ->with('importErrors', $errors);
    }
}
