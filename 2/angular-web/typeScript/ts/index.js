// var isDone: boolean = false; //布尔类型
// var hello: string = "dddd";   // 字符串类型
// var isNumber: number = 6;    //数值类型
// var list: number[] = [1, 2, 3];
// var dname: string[] = ['fsdf', 'fsdf', 'fds'];
// // var arr: Array = [1, 2, 3, 'a', 'b', 'c'];
// class student{
// 		name: string;
// 		age: number;
var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
// }
// var n = new student();
var a = (function () {
    function a(theName) {
        this.name = theName;
    }
    a.prototype.move = function (meters) {
        alert(meters);
    };
    return a;
})();
var aa = (function (_super) {
    __extends(aa, _super);
    function aa(myname) {
        this.name = myname;
        _super.call(this, this.name);
    }
    aa.prototype.move = function (num) {
        _super.prototype.move.call(this, num);
    };
    aa.prototype.add = function (data1) {
        var sum = aa.count + data1;
        return sum;
    };
    aa.count = 10;
    return aa;
})(a);
function pt(obj) {
    alert(obj.label);
}
pt({ label: 'dddd', aaa: 111 });
