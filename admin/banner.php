<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
body{font: normal .8em/1.5em Arial, Helvetica, sans-serif;
	background: #ebebeb;
	width: 90%;
	margin: 70px auto;
	color: #666;
}
#banner{ height:100px; width:100%;
background-color:#e1e1e1;}
#banner ul {
  list-style-type: none;
  overflow: hidden;
 
}
#banner li {
	float: left;
	position: relative;
	list-style: none;
	
}
#banner .search-container {
  float: right;
  
}

#banner input[type=text] {
  padding: 6px;
  margin-top: 28px;
  font-size: 17px;
  border: none;
  width:600px;
}

#banner .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 28px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

#banner .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 800px) {
#banner.search-container {
    float: none;
  }
#banner a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
#banner input[type=text] {
    border: 1px solid #ccc;  
  }
}


  


</style>
</head>

<body>
<ul id="banner">
<li><img src="../clicknow.png"></li>
<li>  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">Search</button>
    </form>
  </div>
</li>

</ul>
</body>
</html>