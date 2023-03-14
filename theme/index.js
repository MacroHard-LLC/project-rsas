function userCheck() {
    if (document.getElementById('studentCheck').checked) {
        document.getElementById('ifStudent').style.display = 'block';
    }
    else {
    	document.getElementById('ifStudent').style.display = 'none';
      }
      
    if (document.getElementById('advisorCheck').checked){
    		document.getElementById('ifAdvisor').style.display = 'block';
    }
    else {
    	document.getElementById('ifAdvisor').style.display = 'none';
      }  
}