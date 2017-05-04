
// 生成表格及表格内容变更

// 属性值
var cateAttr=['颜色','尺码','重量'];
// 具体规格
var cateAttrValue={'颜色':['红色','黑色','白色'],
            '尺码':['170','175','180'],
            '重量':['1KG'],
        };
// 生成表头
var tr="<tr>";
for(var i=0;i<cateAttr.length;i++){
    tr +="<th>"+cateAttr[i]+"</th>";
}
tr +="<th>价格</th>";
tr +="<th>数量</th>";
tr +="<th>重量</th>";
tr +="</tr>";
$('#conten-table').append(tr);

// 获取表格行数
function getRows(id)
{
    return document.getElementById(id).rows.length;
}

// 插入一行
function insert(content)
{
    var temTr="<tr><td>"+content+"</td></tr>";
    $('#conten-table').append(temTr);
}

// 获取后接循环次数
function getAfterLoop(i)
{
    var count=1;
    for(var k=i+1;k<cateAttr.length;k++){
        count *=cateAttrValue[cateAttr[k]].length;
    }
    return count;
}

// 获取前接循环次数
function getBeforeLoop(i)
{
    var count=1;
    var g=i-1;
    for(var k=0;k<i;k++){
        count *=cateAttrValue[cateAttr[k]].length;
    }
    return count;
}

// 生成第一列
var first=cateAttrValue[cateAttr['0']];
for(var j=0;j<first.length;j++){
    // 获取单元格要填写的内容
    var content=first[j];
    // 同样内容的单元格要重复的次数
    var n=getAfterLoop(0);
    for(q=0;q<n;q++){
        // 插入一行
        insert(content);
    }
}

//循环插入第一列之后的每一列
for(var m=1;m<cateAttr.length;m++){
    // 行数索引
    var rowIndex=1;
    // 往前循环次数
    var beforeLoop=getBeforeLoop(m);
    for(var j=0;j<beforeLoop;j++){
        // 往后循环次数
        var loop=getAfterLoop(m);
        // 获取每个规格的长度
        var length=cateAttrValue[cateAttr[m]].length;
        if(length<=0){
            length=1;
        }
        for(var k=0;k<length;k++){
            // 追加的cell内容
            var cellTd="<td>"+cateAttrValue[cateAttr[m]][k]+"</td>";
            // 追加第一列之后的每一列内容
            for(var n=0;n<loop;n++){
                // 获取要追加cell的某一行的tr，并转换成$对象
                var cellTr=$(document.getElementById('conten-table').rows[rowIndex]);
                cellTr.append(cellTd);
                rowIndex +=1;
            }
        }
    }
}

// 生成价格和数量输入框
for(var m=1;m<getRows('conten-table');m++){
    var price=$('<td><input type="text" style="width:80px;color:black;margin:4px;background:#E6E6E6"></td>');
    var count=$('<td><input type="text" style="width:80px;color:black;margin:4px;background:#E6E6E6"></td>');
    var piliang=$('<td><a style="cursor:pointer" onclick="javascript:piliang(this)">批量操作</a></td>');
    $("#conten-table tr:eq("+m+")").append(price).append(count).append(piliang);
}