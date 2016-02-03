// var isDone: boolean = false; //布尔类型
// var hello: string = "dddd";   // 字符串类型
// var isNumber: number = 6;    //数值类型
// var list: number[] = [1, 2, 3];
// var dname: string[] = ['fsdf', 'fsdf', 'fds'];
// // var arr: Array = [1, 2, 3, 'a', 'b', 'c'];
// class student{
// 		name: string;
// 		age: number;
	
// }
// var n = new student();

class a{
		name: string;
		constructor(theName:string){
				this.name = theName;

		}
		move(meters:number){
				alert(meters);
		}
}

class aa  extends a{
		name: string;

		static count = 10;
		constructor(myname:string){
				this.name = myname;
				super(this.name);
		}
		move(num:number){
				super.move(num);
		}
		add(data1: number): number {
        var sum = aa.count + data1;
        return sum;
		}
}
// var test = new aa('tanjibo');
// test.move(20);

interface t{
		label?: string;  //可选属性
		aaa?: number;
}

function pt(obj:t){
		alert(obj.label);
}

pt({ label: 'dddd', aaa: 111 });

/**
 * 定义函数
 */
interface SearchFunc {
		(source: string, subString: string): boolean; //定义一个匿名方法
}

var mySearch: SearchFunc;
mySearch = function(source: string, subString: string) {  //实现接口
		var result = source.search(subString);  //调用系统方法search查找字符串的位置
		if (result == -1) {
        return false;
		}
		else {
        return true;
		}
}


interface stringArray{
		[index: number]: string;
}

var myArray: stringArray;
myArray=