class Errors {
    constructor() {
        this.errors = {};
    }

    get(field) {
        if (_.has(this.errors, "errors." + field)) {
            return this.errors.errors[field][0];
        }
    }

    clear(field) {
        if (field && _.has(this.errors, "errors." + field)) {
            delete this.errors.errors[field];
            return;
        }
        //this.errors = {};
    }

    has(field) {
        return _.has(this.errors, "errors." + field);
    }

    any() {
        if (_.has(this.errors, "errors")) {
            return Object.keys(this.errors.errors).length > 0;
        }
    }

    /*    any(field) {
        if (_.has(this.errors, 'errors.' + field)) {
            console.log(this.errors.errors[field].length > 0);
            return this.errors.errors[field].length > 0;
            /!*return Object.keys(this.errors).length > 0;*!/
        }
    }*/

    record(errors) {
        this.errors = errors;
    }
}

export default Errors;
