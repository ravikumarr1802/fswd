import java.io.*;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.http.*;
public class CreateDatabase extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        Connection conn = null;
        Statement stmt = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            out.println("JDBC Driver registered.<br>");
            conn = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/","root","#ravi!$#1802");
            out.println("Connected to MySQL server.<br>");
            stmt = conn.createStatement();
            String sql = "CREATE DATABASE test";
            stmt.executeUpdate(sql);
            out.println("Database 'test' created successfully.<br>");

        } catch (SQLException se) {
            se.printStackTrace(out);
            out.println("SQLException: " + se.getMessage());
        } catch (Exception e) {
            e.printStackTrace(out);
            out.println("Exception: " + e.getMessage());
        } 
    }
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        doGet(request, response);
    }
}
