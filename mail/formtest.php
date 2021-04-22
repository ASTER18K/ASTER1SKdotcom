<?

$tomail = "xxxx@naver.com"; //이 폼메일을 받을 메일주소


function error($text){
 echo "
  <script language=javascript>
  window.alert('$text')
  history.go(-1)
  </script>";
 exit;
}

function msg($text){
 echo "
  <script language=javascript>
  window.alert('$text')
  top.location.href = 'formtest.html'
  </script>
 ";
 exit;
}

if (!$name) {error('성명을 적어주세요');} // 이름이 없을때 에러 메세지
if (!$sex) {error('성별을 선택해 주세요');}

if (!$email) {error('메일 주소를 적어주세요');} // 메일주소가 없을때 에러 메세지
if (!$subject) {error('제목을 적어주세요');} // 제목이 없을때 에러 메세지

 

$mailheaders = "Return-Path: $email \r\n"; // 메일 헤더의 반송 메일 주소
$mailheaders .= "From: $name <$email>\r\n"; // 메일헤더의 이름과 메일 주소 표시

$body = " 이름 : $name \r\n";
$body .= " 메일주소 : $email \r\n";
$body .= " 성별 : $sex \r\n";
$body .= " 직업 : $job \r\n";
$body .= " 내 용 : $content \r\n";

$result=mail($tomail , $subject , $body , $mailheaders); // 메일 전송

if($result) {msg('메일이 성공적으로 발송되었습니다.');} // 전송 성공시

else{error('메일 발송에 실패하였습니다.');} // 전송 실패시

?>