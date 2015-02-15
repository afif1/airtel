var xmlHttp = createXmlHttpRequestObject();

	function createXmlHttpRequestObject(){
		
		var xmlHttp;
		
		if(window.ActiveXObject){
			
			try{
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				xmlHttp = false;
			}
		}else{
			
			try{
				xmlHttp = new XMLHttpRequest();
			}catch(e){
				xmlHttp = false;
			}
		}
		
		if(!xmlHttp){
			
			alert("cant create that object hosss!");
		}else{
			return xmlHttp;
		}
	}
	
	function process(){
		
		if(xmlHttp.readyState == 0 || xmlHttp.readyState == 4){
			
			RealTimeInput = encodeURIComponent(document.getElementById("userInput").value);
			xmlHttp.open("GET", "RealTimeFetch.php?fetch=" + RealTimeInput, true);
			xmlHttp.onreadystatechange = handleServerResponse;
			xmlHttp.send(null);
			
		}else{
			setTimeout('process()', 500);
		}
	}
	
	function handleServerResponse(){
		
		if(xmlHttp.readyState == 4){
			if(xmlHttp.status == 200){
				
				xmlResponse = xmlHttp.responseXML;
				xmlDocumentElement = xmlResponse.documentElement;
				message = xmlDocumentElement.firstChild.data;
				document.getElementById("underInput").innerHTML = '<span style="color:red; font-weight: bold; font-size: 200%;">' + message + '</span>';
				
				setTimeout('process()', 500);
			}else{
				
				//alert("Something went wrong");
			
			}
		}
	}
