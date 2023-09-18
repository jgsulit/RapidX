class Department {
	// constructor
  	constructor() {
    	this._department_id;
    	this._department_name;
		this._department_stat;
		this._update_version;
		this._created_at;
		this._updated_at;
  	}

  	// getters and setters
  	get department_id() {
    	return this._department_id;
  	}
  	set department_id(department_id) {
    	this._department_id = department_id;
  	}
  	get department_name() {
    	return this._department_name;
  	}
  	set department_name(department_name) {
    	this._department_name = department_name;
  	}
  	get department_stat() {
    	return this._department_stat;
  	}
  	set department_stat(department_stat) {
    	this._department_stat = department_stat;
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
  	GetDepartmentByStat(){
  		let _jsonObject = [];
  		$.ajax({
  			url: 'get_department_by_stat',
  			method: 'get',
  			data: {
  				'department_stat': this.department_stat
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