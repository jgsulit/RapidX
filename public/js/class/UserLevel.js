class UserLevel {
    // constructor
    constructor() {
        this._user_level_id;
        this._user_level_name;
        this._user_level_stat;
        this._update_version;
        this._created_at;
        this._updated_at;
    }

    // getters and setters
    get user_level_id() {
        return this._user_level_id;
    }
    set user_level_id(user_level_id) {
        this._user_level_id = user_level_id;
    }
    get user_level_name() {
        return this._user_level_name;
    }
    set user_level_name(user_level_name) {
        this._user_level_name = user_level_name;
    }
    get user_level_stat() {
        return this._user_level_stat;
    }
    set user_level_stat(user_level_stat) {
        this._user_level_stat = user_level_stat;
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
    GetUserLevelByStat(){
        let _jsonObject = [];
        $.ajax({
            url: 'get_user_level_by_stat',
            method: 'get',
            data: {
                'user_level_stat': this.user_level_stat
            },
            async: false,
            dataType: 'json',
            beforeSend: function(){
                
            },
            success: function(JsonObject){
                _jsonObject = JsonObject;
            }
        });
        return _jsonObject;
    }
}