class count{
	//窗口高度
	windowH: number;
	objH: number;
	objP: any;
	constructor(objP:string,child:string){
			this.windowH = window.innerHeight;
			this.objP=document.getElementsByClassName(objP);
			this.objP.getElementsByClassName(child).[0]
			
	}


}
var a = new count('foodCarving', 'food_r');