<%@ page import="java.sql.*" %>
<!DOCTYPE html>
<html>
<head>
    <title>Create Users Table</title>
</head>
<body>
    <h2>Create Users Table</h2>
    <%
        String url = "jdbc:mysql://127.0.0.1:3306/DS";
        String dbUsername = "root"; // Your MySQL username
        String dbPassword = "#ravi!$#1802"; // Your MySQL password
        Connection conn = null;
        Statement stmt = null;
        Class.forName("com.mysql.cj.jdbc.Driver");
        conn = DriverManager.getConnection(url, dbUsername, dbPassword);
        stmt = conn.createStatement();
        String sql = "CREATE TABLE MUsers (" +
                        "id INT AUTO_INCREMENT PRIMARY KEY, " +
                        "username VARCHAR(50) NOT NULL UNIQUE, " +
                        "password VARCHAR(50) NOT NULL, " +
                        "email VARCHAR(100) NOT NULL, " +
                        "fullname VARCHAR(100))";
        stmt.executeUpdate(sql);
        out.println("Table Users created successfully.<br>");
    %>
</body>
</html>
