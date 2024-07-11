<%@ page import="java.sql.*" %>
<!DOCTYPE html>
<html>
<head>
    <title>Create Database</title>
</head>
<body>
    <h2>Create Database and Table</h2>
    <%
    String url = "jdbc:mysql://127.0.0.1:3306/";
    String dbUsername = "root"; // Your MySQL username
    String dbPassword = "#ravi!$#1802"; // Your MySQL password
    Connection conn = null;
    Statement stmt = null;
    Class.forName("com.mysql.cj.jdbc.Driver");
    conn = DriverManager.getConnection(url, dbUsername, dbPassword);
    stmt = conn.createStatement();
    String sql = "CREATE DATABASE IF NOT EXISTS DS";
    stmt.executeUpdate(sql);
    out.println("Database DS created successfully.<br>");
    %>
</body>
</html>
