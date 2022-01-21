<body>
    <div>hello</div>
<script>
    // let 은 변수에 재할당이 가능하다.
    let name = 'teayoung';
    console.log(`나의 이름은 ${name}`); // 나의이름은 taeyoung

    // let name = 'ttaey_y';
    // console.log(`나의 이름은 ${name}`); // 에러

    name = 'react'; // 변수 재할당 가능
    console.log(`나의 이름은 ${name}`); // 나의 이름은 react




    // const는 변수 재선언, 변수 재할당 모두 불가능하다.
    const Age = 'twenty six';
    console.log(`나의 나이는 ${Age}`);

    const Age = 'twenty five';
    console.log(`나의 나이는 ${Age}`); //재선언 불가능

    Age = 'react';
    console.log(`나의 나이는 ${Age}`); //재할당 불가능
    


    // 따옴표가 아닌 backtick(backquoto)를 사용한다.
    const MyName = '엄태영';
    console.log(`나의 이름은 ${MyName}`);

    let a = 5; b = 10;
    console.log(`Sum of ${a} and ${b} is ${a + b}`);

    document.querySelector('div');
</script>

<?php
    // sprintf를 사용한다.
    $name = '엄태영';
    echo sprintf('나의 이름은 %s', $name);
?>




</body>
