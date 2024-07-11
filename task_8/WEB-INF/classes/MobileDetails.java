import java.io.*;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class MobileDetails extends HttpServlet {

    private PrintStream out;
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
       try{ response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        Connection conn = null;
        Statement stmt = null;
        ResultSet rs = null;
        Class.forName("com.mysql.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/test","root","#ravi!$#1802");
        String sql = "SELECT * FROM mobile_details";
        stmt = conn.createStatement();
        rs = stmt.executeQuery(sql);
        out.println("<h1>Mobile Phone Details</h1>");
        out.println("<table border='1'>");
        out.println("<tr>");
        out.println("<th>Model ID</th>");
        out.println("<th>Company</th>");
        out.println("<th>Price</th>");
        out.println("<th>Color</th>");
        out.println("</tr>");
        while (rs.next()) {
            out.println("<tr>");
            out.println("<td>" + rs.getString("model_id") + "</td>");
            out.println("<td>" + rs.getString("company") + "</td>");
            out.println("<td>" + rs.getString("price") + "</td>");
            out.println("<td>" + rs.getString("color") + "</td>");
            out.println("</tr>");
        }
        out.println("</table>");
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
