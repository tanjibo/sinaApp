var passcode:string="secret passcode";
class e{
	private _fullName:string;

	get fullName():string{
		return this._fullName;
	}

	set fullName(newName:string){
     if(passcode && passcode=='secret passcode'){
     	this._fullName=newName;
     }else{
     	alert('dddd');
     }
	}
}

var ed=new e();
ed.fullName='fdsfs';