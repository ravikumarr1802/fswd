<%@ page import="java.sql.*" %>
<% 
    String url = "jdbc:mysql://127.0.0.1:3306/DS";
    String dbUsername = "root"; // Your DB username
    String dbPassword = "#ravi!$#1802"; // Your DB password
    String driver = "com.mysql.cj.jdbc.Driver";
    String username = request.getParameter("username");
    String password = request.getParameter("password");
        Class.forName(driver);
        Connection conn = DriverManager.getConnection(url, dbUsername, dbPassword);
        String sql = "SELECT * FROM MUsers WHERE username = ? AND password = ?";
        PreparedStatement ps = conn.prepareStatement(sql);
        ps.setString(1, username);
        ps.setString(2, password);
        ResultSet rs = ps.executeQuery();
        if (rs.next()) {
            response.sendRedirect("welcome.jsp");
        } else {
            out.println("Invalid username or password");
        }
        conn.close();
%>
