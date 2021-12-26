const genders=["Male","Female","Other"];
function getData(_data) {
    let d=[];
    for (const key in _data) {
        if (Object.hasOwnProperty.call(_data, key)) {
            const element = _data[key];
            d[key]=[];
            if(element!=null){

                arr=element.split(',');
                arr.forEach(element_inner => {
                    d[key].push(element_inner.split(':'));
                });
            }
        }
    }
    console.log(d);
    return d;

}

function getOptions(_data,i){
    if(i==undefined || i==null){
        i=1;
    }
    let html='';
    _data.forEach(e => {
        html+="<option value='"+e[0]+"'>"+e[i]+"</option>"
    });
    return html;
}

function anotherSelect(arr,val,i){
    _arr=[];
    for (let index = 0; index < arr.length; index++) {
        const ele = arr[index];
        if(ele[i]==val){
            _arr.push(ele);
        }
    }
    return _arr;
}

function renderDataList(name,list){
    html="<datalist id='data-"+name+"'>"
    list.forEach(ele => {
        
        html+="<option value='"+ele+"'>"+ele+"</option>"
    });
    html+="</datalist>";
    document.write(html);
}


function initSwitch(){
    $('[switch]').each(function (index, ele) {
        const sw=ele.dataset.switch;
        if(!ele.checked){
            $(sw).hide();
        }else{
            $(sw).show();
        }
        $(ele).click(function (e) { 
            if(!ele.checked){
                $(sw).hide();
            }else{
                $(sw).show();
            }
            
        });
        
    });
}


function block(ele) {
    $(ele).block({ message: '<div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span></div>'});
}

function unblock(ele) {
    $(ele).unblock();
}