<html>
    <head>
    <style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid #7D1E83;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
</style>
    </head>
    <body>
    <h2>Service order</h2>
    <table style="width:100%">
  <tr>
    <th>الأسم</th>
    <th>البريد الألكتروني</th>
    <th>رقم الهاتف</th>
    <th>الأستفسار</th>
  </tr>
  <tr>
    <td>{{ $fname }}</td>
    <td>{{ $email }}</td>
    <td>{{ $phone }}</td>
    <td>{{ $topic }}</td>
  </tr>
</table>
    </body>
</html>