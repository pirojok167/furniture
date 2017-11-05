<table border="1px" cellpadding="10px" cellspacing="5px">
    <tr>
        <th>name</th>
        <th>phone</th>
        <th>email</th>
        <th>comment</th>
    </tr>
    <tr>
        <td>{{ $user_data['name'] }}</td>
        <td>{{ $user_data['phone'] }}</td>
        <td>{{ $user_data['email'] }}</td>
        <td>{{ $user_data['comment'] }}</td>
    </tr>
</table>