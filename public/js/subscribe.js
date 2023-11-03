const SOAP_URL = "http://localhost:8080/subscription";

const subscribe = async () => {
    let user_id = 2;
    const syntax = `
    <?xml vresion="1.0" encoding="utf-8" ?>
    <soapenv:Envelope
    xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"
    xmlns:tns="http://service.LMS.com/">
    <soapenv:Body>
        <tns:subscribe>
            <user_id>${user_id}</user_id>
        </tns:subscribe>
    </soapenv:Body>
</soapenv:Envelope>`
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST",SOAP_URL, true);
    xhr.setRequestHeader("Content-Type","text/xml");
    xhr.onload = function(){
        console.log(this)
        if(this.status === 200){
            console.log(this.responseText)
        }else{
            console.log(this);
        }
    }
    xhr.send(syntax)
};
