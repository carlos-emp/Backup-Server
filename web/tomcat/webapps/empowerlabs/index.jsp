<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Empower Conference</title>
</head>
<body>
<%int cantidad = request.getParameter("cantidad")==null?7:Integer.parseInt(request.getParameter("cantidad"));%>
<%for(int i=1; i<cantidad; i++){%>
<%= "<h"+i+">Iteración "+i+"</h"+i+">" %>
<%}%>
</body>
</html>