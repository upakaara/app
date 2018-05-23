<table class="table table-hover" id="jobListTable">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Colaborators</th>
            <th scope="col">Type</th>
            <th scope="col">Duration(days)</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobs as $job)
            <tr>
                <td><a href={{ url('jobs', [$job->id]) }}/>{{ $job->title }}</td>
                <td>{{ $job->description }}</td>
                <td></td>
                <td>{{ $job->jobType->name }}</td>
                <td>{{ $job->duration }}</td>
                <td>{{ $job->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>