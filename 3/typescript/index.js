var passcode = "secret passcode";
var e = (function () {
    function e() {
    }
    Object.defineProperty(e.prototype, "fullName", {
        get: function () {
            return this._fullName;
        },
        set: function (newName) {
            if (passcode && passcode == 'secret passcode') {
                this._fullName = newName;
            }
            else {
                alert('dddd');
            }
        },
        enumerable: true,
        configurable: true
    });
    return e;
})();
var ed = new e();
ed.fullName = 'fdsfs';
