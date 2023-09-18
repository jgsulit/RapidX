class User{
    // constructor
    constructor() {
        this._id;
        this._user_name;
        this._email;
        this._password;
        this._is_password_changed;
        this._user_stat;
        this._user_level = new UserLevel();
        this._department = new Department();
        this._update_version;
        this._created_at;
        this._updated_at;
    }

    // getters and setters
    get id() {
        return this._id;
    }
    set id(id) {
        this._id = id;
    }
    get user_name() {
        return this._user_name;
    }
    set user_name(user_name) {
        this._user_name = user_name;
    }
    get email() {
        return this._email;
    }
    set email(email) {
        this._email = email;
    }
    get password() {
        return this._password;
    }
    set password(password) {
        this._password = password;
    }
    get user_stat() {
        return this._user_stat;
    }
    set user_stat(user_stat) {
        this._user_stat = user_stat;
    }
    get user_level() {
        return this._user_level;
    }
    set user_level(user_level) {
        this._user_level = user_level;
    }
    get department() {
        return this._department;
    }
    set department(department) {
        this._department = department;
    }
    get update_version() {
        return this._update_version;
    }
    set update_version(update_version) {
        this._update_version = update_version;
    }
    get created_at() {
        return this._created_at;
    }
    set created_at(created_at) {
        this._created_at = created_at;
    }
    get updated_at() {
        return this._updated_at;
    }
    set updated_at(updated_at) {
        this._updated_at = updated_at;
    }

    // functions
    GetUserByStat(){
        let _jsonObject = [];
        $.ajax({
            url: 'get_user_by_stat',
            method: 'get',
            data: {
                'user_stat': this.user_stat
            },
            async: false,
            dataType: 'json',
            beforeSend: function(){
                
            },
            success: function(JsonObject){
                _jsonObject = JsonObject;
            },
            error: function(data, xhr, status){
                _jsonObject = [];
                console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            }
        });
        return _jsonObject;
    }

    // AddUser(formAddUser){
    //     let _result = false;
    //     $.ajax({
    //         url: "add_user",
    //         method: "post",
    //         data: formAddUser,
    //         dataType: "json",
    //         beforeSend: function(){

    //         },
    //         success: function(JsonObject){
    //             if(JsonObject['result'] == 1){
    //                 _result = true;
    //             }
    //         },
    //         error: function(data, xhr, status){
    //             _result = false;
    //             console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
    //         }
    //     });
    //     return _result;
    // }
}