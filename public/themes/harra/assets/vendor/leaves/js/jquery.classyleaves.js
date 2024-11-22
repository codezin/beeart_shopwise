var ClassyLeaves = function (l) {
    this.numLeaves = 0;
    this.__constructor = function (c) {
        var b = this,
            a = 0;
        this.settings = $.extend({ leaves: 50, maxY: 100, speed: 3e3, infinite: !0, multiplyOnClick: !0, multiply: 1, folder: "assets/img/leaves/", numImages: 8 }, c);
        for (c = 0; c < this.settings.leaves; c++)
            switch (((a = 1 + Math.floor(2 * Math.random())), a)) {
                case 1:
                    this._create("left");
                    break;
                case 2:
                    this._create("right");
            }
    };

    this._drop = function (c) {
        var a = $("#" + c);
        var tp = this._random(560,650);
        a.removeClass("ClassyLeaf").addClass("ClassyLeafFalling");
        a.animate({ top:  tp }, 5e3, function () {});
    };
    this._create = function (c) {
        var b, a, d;
        this.numLeaves += 1;
        a = 1 + Math.floor(Math.random() * this.settings.numImages);
        b = 1 + Math.floor(4 * Math.random());
        $("#tree-panel").append('<img id="leaf' + this.numLeaves + '" class="ClassyLeaf x' + b + '" src="' + this.settings.folder + a + '.png" />');
        b = $("#leaf" + this.numLeaves);
        b.rotate({ animateTo: a, duration: d, center: ["10%", "110%"] });
        b.animate({ opacity: 1 }, d - 400);
        var swidth = $("#tree-panel").width() - 150;
        var sheight = $("#tree-panel").height() - 220;
        var lf = this._random(50, swidth);
        var tp=this._random(260, sheight);
        b.css({ left: lf + "px", bottom: tp + "px" });
    };
    this._random = function (c, b) {
        return Math.floor(Math.random() * (b - c + 1) + c);
    };
    return this.__constructor(l);
};
