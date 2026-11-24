@php
    $role = 'staff';
    $currentProject = null;
    $user = [
        'name' => auth()->user()->name,
        'number' => auth()->user()->student_number ?: auth()->user()->email,
    ];
    $projects = [
        ['slug' => 'liveworks-archive', 'name' => 'LiveWorks Archive', 'student' => 'Filip Riccio'],
        ['slug' => 'farm-tour-bookings', 'name' => 'Farm Tour Bookings', 'student' => 'Rich Harris'],
        ['slug' => 'local-gym-website', 'name' => 'Local Gym Website', 'student' => 'Dave Rupert'],
        ['slug' => 'council-website', 'name' => 'Council Website', 'student' => 'Blake Smith'],
        ['slug' => 'cafe-ordering-system', 'name' => 'Cafe Ordering System', 'student' => 'Chris Coyier'],
        ['slug' => 'event-ticket-website', 'name' => 'Event Ticket Website', 'student' => 'Scott Tolinski'],
    ];
@endphp

<x-ui.dashboard-layout
    title="Create Project — LiveWorks Archive"
    :role="$role"
    :projects="$projects"
    :current-project="$currentProject"
    :user="$user"
>
    <section class="dashboard-content">
        <p>STAFF DASHBOARD</p>
        <h1>Create project</h1>
        <p>Create a LiveWorks archive record and assign students in one step.</p>

        <form
            class="create-project"
            action="{{ route('ui.staff.projects.publish') }}"
            method="post"
        >
            @csrf

            <div class="create-layout">
                <div class="project-fields">
                    <label for="project-name">Project Name</label>
                    <input id="project-name" name="project_name" type="text" placeholder="Project name" required>

                    <fieldset class="due-date">
                        <legend>Due Date</legend>
                        <div>
                            <input name="day" type="text" inputmode="numeric" placeholder="DD" maxlength="2" required>
                            <input name="month" type="text" inputmode="numeric" placeholder="MM" maxlength="2" required>
                            <input name="year" type="text" inputmode="numeric" placeholder="YYYY" maxlength="4" required>
                        </div>
                    </fieldset>

                    <label for="course">Course</label>
                    <select id="course" name="course" required>
                        <option value="">Select course</option>
                        <option>Diploma of Web Development</option>
                        <option>Certificate IV in Web Development</option>
                        <option>Diploma of Graphic Design</option>
                        <option>Certificate IV in Information Technology</option>
                    </select>

                    <label for="student-name">Add Student</label>
                    <div class="add-student">
                        <input id="student-name" name="student_name" type="text" placeholder="Student name" autocomplete="off">
                        <button type="button">+</button>
                    </div>
                </div>

                <section class="assigned-students">
                    <h2>Assigned Students</h2>
                    <ul></ul>
                </section>
            </div>

            <footer class="form-footer">
                <div>
                    <button type="button">Save Draft</button>
                    <button type="submit">Publish Project</button>
                </div>
            </footer>
        </form>
    </section>
</x-ui.dashboard-layout>
