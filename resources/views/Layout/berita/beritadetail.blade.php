
    <table class="table">
        <thead>
            <tr>
                <th> ID </th>
                <th> Title </th>
                <th> Author </th>
                <th> Tahun </th>
            </tr>
        </thead>
        <tbody>
<tr>
                    <td> {{ $berita['id'] }} </td>
                    <td> {{ $berita['title'] }} </td>
                    <td> {{ $berita['author'] }} </td>
                    <td> {{ $berita['published_at'] }} </td>
                </tr>
        </tbody>
        
        </table>