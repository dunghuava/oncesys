/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('select2');


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

function rInt() {
    var date = new Date();
    return date.getDate() + '' + ((date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : (date.getMonth() + 1)) + '' + date.getFullYear().toString().substr(2, 2) + '_' + date.getMilliseconds();
}


var vi_location = {
    district: [],
    ward: []
}
var benh_nhan_obj = {
    ma: 'BN' + rInt(),
    ho_ten: '',
    gioi_tinh: 0,
    ngay_sinh: '',
    tuoi: '',
    dien_thoai: '',
    dia_chi: '',
    province_id: 0,
    district_id: 0,
    ward_id: 0,
    facebook: '',
    email: '',
    zalo: '',
    ghi_chu: ''
}
const forn_end = new Vue({
    el: '#front_end',
    data: {
        vi_location: vi_location,
        benh_nhan: benh_nhan_obj,
        isdelete: false,
        id: 0,
        isabout: false
    },
    methods: {
        getDistrict: function () {
            axios.get('api/f/get-district/' + this.benh_nhan.province_id).then(res => {
                this.benh_nhan.district_id = 0;
                this.benh_nhan.ward_id = 0;
                this.vi_location.district = res.data;
            });
        },
        getWard: function () {
            axios.get('api/f/get-ward/' + this.benh_nhan.district_id).then(res => {
                this.benh_nhan.ward_id = 0;
                this.vi_location.ward = res.data;
            });
        },
        deleteId: function () {
            axios.get('api/f/delete-id/' + this.id).then(res => {
                location.reload();
            });
        }
    }
});

// back-end
var thuoc_obj = {
    ma: 'T' + rInt(),
    ten: '',
    id_loai: 0,
    gia_von: 0,
    gia_ban: 0,
    so_luong: 0,
    ngay_sx: '',
    han_sd: '',
    chi_tiet: ''
};
var kinh_obj = {
    ma: 'K' + rInt(),
    ten: '',
    id_loai: 0,
    gia_von: 0,
    gia_ban: 0,
    so_luong: 0,
    ngay_sx: '',
    han_sd: '',
    chi_tiet: ''
};
var bn_obj = {
    id: 0,
    dien_thoai: '<trống>',
    gioi_tinh: '?',
    tuoi: '<trống>',
    ho_ten: 'Vui lòng chọn bệnh nhân',
    province: '<trống>',
    district: '<trống>',
    ward: '<trống>'
};
Number.prototype.format = function (n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = this.toFixed(Math.max(0, ~~n));

    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};
const back_end = new Vue({
    el: '#backend-thuoc',
    components: {
    },
    data: {
        isAddCate: false,
        isAdd: false,
        isDelete: false,
        isUpdate: false,
        thuoc: thuoc_obj,
        list_thuoc_cate: [],
        list_thuoc: [],
        kinh: kinh_obj,
        bn_obj: bn_obj,
        itemThuoc: { id: 0 },
        list_kinh_cate: [],
        cate_name: '',
        khambenh: { dan_do: '- Tái khám lại sau ... ngày / tuần' },
        bangkinh: {},
        bangthuoc: [],
        id: 0,
        tong_chiphi: 0,
        success: false,
        header: '',
        str: ''
    },
    created() {
        console.log(this.options1);

        this.getCateThuoc(),
            this.getCateKinh(),
            this.getAllThuoc()
    },
    methods: {
        setSuccess: function (header, str) {
            this.success = true;
            this.str = str;
            this.header = header;
            setTimeout(() => {
                this.success = false;
            }, 4000);
        },
        sumTien: function (event) {
            var val = event.target.value;
        },
        saveKhambenh: function () {

            this.khambenh.id_benhnhan = this.id;
            this.khambenh.chi_phi = this.tong_chiphi;

            if (this.id != 0) {
                axios.post('api/b/save-kham-benh', { 'khambenh': this.khambenh, 'bangkinh': this.bangkinh, 'bangthuoc': this.bangthuoc }).then(res => {
                    lazyload();
                    this.id = 0;
                    this.setSuccess('SUCCESS', 'Lưu dữ liệu thành công');
                });
            } else {
                this.setSuccess('THÔNG BÁO', 'Chưa chỉ định bệnh nhân được khám');
            }
        },
        getText: function (event) {
            var item = this.list_thuoc.find(item => item.id == event.target.value);
            this.itemThuoc.ten = item.ten;
            this.itemThuoc.gia = item.gia_ban;
            this.itemThuoc.gia_von = item.gia_von;
            this.itemThuoc.loai = item.loai;
            console.log(event);

        },
        addDSThuoc: function () {
            var item = {
                id_thuoc: this.itemThuoc.id,
                ten: this.itemThuoc.ten,
                so_luong: this.itemThuoc.so_luong,
                gia: this.itemThuoc.gia,
                gia_von: this.itemThuoc.gia_von,
                loai: this.itemThuoc.loai,
                lieu_dung: this.itemThuoc.lieu_dung
            }
            if (parseInt(item.so_luong) > 0) {
                this.bangthuoc.push(item);
                var sum = 0;
                this.bangthuoc.map(function (item) {
                    sum += (item.gia * item.so_luong);
                });
                this.tong_chiphi = sum;
                this.tong_chiphi = this.tong_chiphi.format(0, 3, '.');
            }
        },
        removeT: function (index) {
            this.bangthuoc.splice(index, 1);
            var sum = 0;
            this.bangthuoc.map(function (item) {
                sum += (item.gia * item.so_luong);
            });
            this.tong_chiphi = sum;
            this.tong_chiphi = this.tong_chiphi.format(0, 3, '.');
        },
        getAllThuoc: function () {
            axios.get('api/b/get-all-thuoc').then(res => {
                this.list_thuoc = res.data;
                console.log(this.list_thuoc);

            });
        },
        getCateThuoc: function () {
            axios.get('api/b/get-cate-thuoc').then(res => {
                this.list_thuoc_cate = res.data;
            });
        },
        getCateKinh: function () {
            axios.get('api/b/get-cate-kinh').then(res => {
                this.list_kinh_cate = res.data;
            });
        },
        addCateThuoc: function () {
            if (this.cate_name.trim() != '') {
                axios.post('api/b/add-cate-thuoc', { ten: this.cate_name }).then(res => {
                    this.list_thuoc_cate.push(res.data);
                    this.isAddCate = false;
                    this.thuoc.id_loai = res.data.id;
                    this.cate_name = '';
                }).catch(function (e) {
                    setMessage('Lỗi', 'Cập nhật dữ liệu không thành công')
                });
                this.isAdd = false;
            }
        },
        addCateKinh: function () {
            if (this.cate_name.trim() != '') {
                axios.post('api/b/add-cate-kinh', { ten: this.cate_name }).then(res => {
                    this.list_kinh_cate.push(res.data);
                    this.isAddCate = false;
                    this.kinh.id_loai = res.data.id;
                    this.cate_name = '';
                }).catch(function (e) {
                    setMessage('Lỗi', 'Cập nhật dữ liệu không thành công')
                });;
                this.isAdd = false;
            }
        },
        addThuoc: function () {
            if (this.thuoc.ten.trim() != '') {
                axios.post('api/b/add-thuoc', this.thuoc).then(res => {
                    location.reload();
                }).catch(function (e) {
                    setMessage('Lỗi', 'Cập nhật dữ liệu không thành công')
                });;
            }
        },
        addKinh: function () {
            if (this.kinh.ten.trim() != '') {
                axios.post('api/b/add-kinh', this.kinh).then(res => {
                    location.reload();
                }).catch(function (e) {
                    setMessage('Lỗi', 'Cập nhật dữ liệu không thành công')
                });;
            }
        },
        deleteIdThuoc: function () {
            axios.get('api/b/delete-thuoc/' + this.id).then(res => {
                location.reload();
            });
        },
        deleteIdKinh: function () {
            axios.get('api/b/delete-kinh/' + this.id).then(res => {
                location.reload();
            });
        },
        getUpdateThuoc: function () {
            axios.get('api/b/get-thuoc/' + this.id).then(res => {
                this.thuoc = res.data[0];
            });
        },
        getUpdateKinh: function () {
            axios.get('api/b/get-kinh/' + this.id).then(res => {
                this.kinh = res.data[0];
            });
        },
        updateThuoc: function () {
            if (this.thuoc.ten.trim() != '') {
                axios.post('api/b/update-thuoc', this.thuoc).then(res => {
                    location.reload();
                }).catch(function (error) {
                    console.log(error);
                    setMessage('Lỗi', 'Cập nhật dữ liệu không thành công')
                });;
            }
        },
        updateKinh: function () {
            if (this.kinh.ten.trim() != '') {
                axios.post('api/b/update-kinh', this.kinh).then(res => {
                    location.reload();
                }).catch(function (e) {
                    setMessage('Lỗi', 'Cập nhật dữ liệu không thành công')
                });;
            }
        },
        getBenhNhanID: function () {
            axios.get('api/b/get-benh-nhan-id/' + this.id).then(res => {
                this.bn_obj = res.data[0];
            });
        }
    }
})

// vue select
