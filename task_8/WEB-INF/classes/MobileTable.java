import java.io.*;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class MobileTable extends HttpServlet {

    private PrintStream out;

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try{
            response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        Connection conn = null;
        Statement stmt = null;
        Class.forName("com.mysql.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/test","root","#ravi!$#1802");
        String sql = "CREATE TABLE IF NOT EXISTS mobile_details (" +
                        "id INT AUTO_INCREMENT PRIMARY KEY, " +
                        "model_id VARCHAR(50) NOT NULL, " +
                        "company VARCHAR(50) NOT NULL, " +
                        "price DECIMAL(10, 2) NOT NULL, " +
                        "color VARCHAR(30) NOT NULL" +
                        ")";
        stmt = conn.createStatement();
        stmt.executeUpdate(sql);
        out.println("<h1>Table 'mobile_details' created successfully</h1>");
        }catch (Exception e) {
            e.printStackTrace(out);
            out.println("Exception: " + e.getMessage());
        }
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        doGet(request, response);
    }
}
