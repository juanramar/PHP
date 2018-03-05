/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import com.sun.org.apache.xerces.internal.impl.dv.util.Base64;
import sun.security.pkcs.PKCS7;
import sun.security.pkcs.SignerInfo;

function original(firmado) {
    try {
        PKCS7 p7 = new PKCS7(Base64.decode(firmado));
        SignerInfo[] si = null;

        // check if data is “attached” to this P7 blob
        if (p7.getContentInfo().getContentBytes() == null) {
        // do the verification on the data provided
        si = p7.verify(firmado.getBytes());
        }
        else {
        // original data is embedded or “attached” to this P7,implicit verification will do…
        si = p7.verify();
    }
    
}
