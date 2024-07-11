<%@ page import="java.sql.*" %>
<%@ page import="javax.servlet.*" %>
<%@ page import="javax.servlet.http.*" %>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Process</title>
</head>
<body>
    <h2>Registration Process</h2>
    <%
        String url = "jdbc:mysql://127.0.0.1:3306/DS";
        String dbUsername = "root"; // Your MySQL username
        String dbPassword = "#ravi!$#1802"; // Your MySQL password
        String username = request.getParameter("username");
        String password = request.getParameter("password");
        String email = request.getParameter("email");
        String fullname = request.getParameter("fullname");
        Connection conn = null;
        PreparedStatement pstmt = null;
        try {
            // Load the JDBC driver
            Class.forName("com.mysql.cj.jdbc.Driver");
            // Establish connection
            conn = DriverManager.getConnection(url, dbUsername, dbPassword);

            // Insert data into the Users table
            String sql = "INSERT INTO MUsers (username, password, email, fullname) VALUES (?, ?, ?, ?)";
            pstmt = conn.prepareStatement(sql);
            pstmt.setString(1, username);
            pstmt.setString(2, password);
            pstmt.setString(3, email);
            pstmt.setString(4, fullname);
            int row = pstmt.executeUpdate();
            if (row > 0) {
                out.println("Registration successful.<br>");
            } else {
                out.println("Registration failed.<br>");
            }
        } catch (SQLIntegrityConstraintViolationException e) {
            out.println("Error: Username already exists.<br>");
        }
    %>
</body>
</html>
