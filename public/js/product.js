$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var productModel = {

    name: ko.observable(''),

    quantity: ko.observable(''),

    price: ko.observable(''),

    productId: null,

    products: ko.observableArray([]),

    totalValue: ko.observable('0'),

    submit: function() {
        var that = this;

        var data = {
            name: this.name(),
            quantity: this.quantity(),
            price: this.price(),
            product_id: this.productId
        };

        $.ajax({
            url: window.BASE_URL + '/product',
            data: data,
            method: 'POST'
        })
        .done(function() {
            that.reloadProducts();
            that.name('');
            that.quantity('');
            that.price('');
            that.productId = null;
        })
    },

    calculateTotalValue: function() {
        var total = 0;
        $.each(this.products(), function(index, p) {
            total += p.quantity * p.price;
        });

        this.totalValue(total);
    },

    reloadProducts: function() {
        var that = this;
        $.ajax({
            url: window.BASE_URL + '/products'
        })
        .done(function(data) {
            if (!data.status) {
                return;
            }

            that.products(data.products);
            that.calculateTotalValue();
        })
    },

    editProduct: function(id) {
        var that = this;
        $.ajax({
            url: window.BASE_URL + '/product?id='+ id
        })
        .done(function(data) {
            if (!data.status) {
                return;
            }

            that.name(data.product.name);
            that.quantity(data.product.quantity);
            that.price(data.product.price);
            that.productId = data.product.product_id;
        })
    },

    init: function() {
        this.reloadProducts();
    }

};

ko.applyBindings(productModel, document.getElementById('products'));

productModel.init();