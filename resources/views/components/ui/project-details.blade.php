@props(['project'])

<section class="project-details">
    <h3>Project Details</h3>
    <dl>
        <dt>Student</dt>
        <dd>{{ $project['student'] }}</dd>

        <dt>Course</dt>
        <dd>{{ $project['course'] }}</dd>

        <dt>Archive Cut Off</dt>
        <dd>{{ $project['cutoff'] }}</dd>

        <dt>Client</dt>
        <dd>{{ $project['client'] }}</dd>
    </dl>
</section>
