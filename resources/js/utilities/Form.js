import Errors from "./Errors.js";

class Form {
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    data() {
        let data = Object.assign({}, this);

        delete data.originalData;
        delete data.errors;
        return data;
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = "";
        }
        this.errors.clear();
    }

    post(url, nextLocation) {
        return this.submit("post", url, nextLocation);
    }

    patch(url, nextLocation) {
        return this.submit("patch", url, nextLocation);
    }

    delete(url, nextLocation) {
        return this.submit("delete", url, nextLocation);
    }

    get(url, nextLocation) {
        return this.submit("get", url, nextLocation);
    }

    submit(requestType, url, nextLocation) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    resolve(response.data);
                    if (nextLocation != null) {
                        window.location = nextLocation;
                    }
                })
                .catch(error => {
                    this.onFail(error.response.data);
                    reject(error.response.data);
                });
        });
    }

    onSuccess() {
        this.reset();
    }

    onFail(errors) {
        this.errors.record(errors);
    }
}

export default Form;
