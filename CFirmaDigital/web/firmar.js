function signDigest(text)
            {
                if(window.event)
                window.event.cancelBubble = true;
                var dest = sign(text); //TODO
                alert(dest);
                return dest;
            }
            // CAPICOM constants
            var CAPICOM_STORE_OPEN_READ_ONLY = 0;
            var CAPICOM_CURRENT_USER_STORE = 2;
            var CAPICOM_CERTIFICATE_FIND_SHA1_HASH = 0;
            var CAPICOM_CERTIFICATE_FIND_EXTENDED_PROPERTY = 6;
            var CAPICOM_CERTIFICATE_FIND_TIME_VALID = 9;
            var CAPICOM_CERTIFICATE_FIND_KEY_USAGE = 12;
            var CAPICOM_DIGITAL_SIGNATURE_KEY_USAGE = 0x00000080;
            var CAPICOM_AUTHENTICATED_ATTRIBUTE_SIGNING_TIME = 0;
            var CAPICOM_INFO_SUBJECT_SIMPLE_NAME = 0;
            var CAPICOM_ENCODE_BASE64 = 0;
            var CAPICOM_E_CANCELLED = -2138568446;
            var CERT_KEY_SPEC_PROP_ID = 6;
            var CAPICOM_OTHER_STORE = "other";

            function IsCAPICOMInstalled()
            {
                if(typeof(oCAPICOM) == "object")
                {
                    if( (oCAPICOM.object != null) )
                    {
                        // We found CAPICOM!
                        return true;
                    }
                }
            }
            function FindCertificateByHash()
            {
                try
                {
                    // instantiate the CAPICOM objects
                    var MyStore;
                    MyStore = new ActiveXObject("CAPICOM.Store");
                    // open the current users personal certificate store
                    MyStore.Open(CAPICOM_CURRENT_USER_STORE, "My", CAPICOM_STORE_OPEN_READ_ONLY);
                    // find all of the certificates that have the specified hash
                    //var FilteredCertificates = MyStore.Certificates.Find(CAPICOM_CERTIFICATE_FIND_SHA1_HASH, strUserCertigicateThumbprint);
                    var FilteredCertificates;
                    FilteredCertificates = MyStore.Certificates.Select();

                    var Signer;
                    Signer = new ActiveXObject("CAPICOM.Signer");
                    Signer.Certificate = FilteredCertificates.Item(1);
                    return Signer;

                    // Clean Up
                    MyStore = null;
                    FilteredCertificates = null;
                }
                catch (e)
                {
                    if (e.number != CAPICOM_E_CANCELLED)
                    {
                        var retorno;
                        retorno = new ActiveXObject("CAPICOM.Signer");
                        return retorno;
                    }
                }
            }

            function sign(src)
            {
                if(window.crypto && window.crypto.signText)
                return sign_NS(src);

                return sign_IE(src);
            }

            function sign_NS(src)
            {
                var s = crypto.signText(src, "ask" );
                return s;
            }

            function sign_IE(src)
            {
                try
                {
                    // instantiate the CAPICOM objects
                    var SignedData;
                    SignedData = new ActiveXObject("CAPICOM.SignedData");
                    var TimeAttribute;
                    TimeAttribute = new ActiveXObject("CAPICOM.Attribute");

                    // Set the data that we want to sign
                    SignedData.Content = src;
                    var Signer;
                    Signer = FindCertificateByHash();

                    // Set the time in which we are applying the signature
                    var Today;
                    Today = new Date();
                    TimeAttribute.Name = CAPICOM_AUTHENTICATED_ATTRIBUTE_SIGNING_TIME;
                    TimeAttribute.Value = Today.getVarDate();
                    Today = null;
                    Signer.AuthenticatedAttributes.Add(TimeAttribute);

                    // Do the Sign operation
                    var szSignature;
                    szSignature = SignedData.Sign(Signer, true, CAPICOM_ENCODE_BASE64);
                    return szSignature;
                }
                catch (e)
                {
                    if (e.number != CAPICOM_E_CANCELLED)
                    {
                        alert("An error occurred when attempting to sign the content, the errot was: " + e.description);
                    }
                }
                return "";
            }
            
//********************************************************************

function firmar(original) {
                if (navigator.appName === "Internet Explorer"){
                    // Implementar la firma digital con MS IE con CAPICOM
                    //return firmarExplorer(original);  
                    return FindCertificateByHash();
                    //return signDigest(original);
                    // Implementar la firma digital con MS IE con CAPICOM
                } else {
                    return firmarFirefox(original);
                }
            }
            function firmarExplorer(original){
            }
            
            function firmarFirefox(original) {
                var firmado = window.crypto.signText(original, "ask");
                if (firmado.substring(0,5) == "error") {
                    alert("Su navegador no ha generado una firma valida");
                    return "";
                }
                else if (firmado == "no generada") {
                    alert("No ha generado la firma.");
                    return "";
                }
                else {
                    return firmado ;
                    alert("Firma generada correctamente. Pulse enviar para comprobarlos en servidor.");
                }
            }
            
            
            
                var txtarea = document.getElementById('firmado');
                var copyBtn = document.getElementById('copyBtn');
                var copyMsg = document.getElementById('copyMsg');

                function copyBtn() {
                    txtarea.focus();
                    txtarea.select();
                    copyMsg.style.visibility = "visible";
                };
            

