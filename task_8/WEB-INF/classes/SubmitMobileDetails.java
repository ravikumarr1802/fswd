import java.io.*;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.http.*;
public class SubmitMobileDetails extends HttpServlet {
    private PrintStream out;
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try{
            String modelId = request.getParameter("model_id");
        String company = request.getParameter("company");
        String price = request.getParameter("price");
        String color = request.getParameter("color");
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        Connection conn = null;
        PreparedStatement pstmt = null;
        Class.forName("com.mysql.jdbc.Driver");
        conn = DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/test","root","#ravi!$#1802");
        String sql = "INSERT INTO mobile_details (model_id, company, price, color) VALUES (?, ?, ?, ?)";
        pstmt = conn.prepareStatement(sql);
        pstmt.setString(1, modelId);
        pstmt.setString(2, company);
        pstmt.setString(3, price);
        pstmt.setString(4, color);
        int rowsInserted = pstmt.executeUpdate();
        if (rowsInserted > 0) {
            out.println("<h1>Mobile Details Submitted Successfully</h1>");
            out.println("<p>Model ID: " + modelId + "</p>");
            out.println("<p>Company: " + company + "</p>");
            out.println("<p>Price: " + price + "</p>");
            out.println("<p>Color: " + color + "</p>");
        }
        }catch (Exception e) {
            e.printStackTrace(out);
            out.println("Exception: " + e.getMessage());
        }
    }
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        doPost(request, response);
    }
}
