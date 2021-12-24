/**
    add.php와 edit.php 페이지에 파일업로드영역 추가삭제를 위한 코드입니다.
    업로드 영역은 최대 2개까지만 생성.
    
    create by 엄태영 2021.12.16
**/   
    // attachFile = {
    //     idx:0,
    //     add:function(){ 
    //         var o = this;
    //         var idx = o.idx;
 
    //         var div = document.createElement('div');

    //         div.style.marginTop = '3px';

    //         div.id = 'file' + o.idx;

    //         var file = document.all ? document.createElement('<input name="files2[]">') : document.createElement('input');
    //         file.type = 'file';
    //         file.name = 'files2[]';
    //         file.size = '40';
    //         file.id = 'fileField' + o.idx;

    //         var btn = document.createElement('input');
    //         btn.type = 'button';
    //         btn.value = '파일삭제';
    //         btn.onclick = function(){o.del(idx)}
    //         btn.style.marginLeft = '5px';
    //         console.log(file.id)
    //         if(file.id == 'fileField0'){
    //             div.appendChild(file);
    //             div.appendChild(btn);
    //             document.getElementById('attachFileDiv').appendChild(div);
    //             o.idx++;
    //         }

            
    //     },
    //     del:function(idx){ 
    //         if(document.getElementById('fileField' + idx).value != '' && !confirm('삭제 하시겠습니까?')){
    //             return;
    //         }
    //         document.getElementById('attachFileDiv').removeChild(document.getElementById('file' + idx));
    //     }
    // }
