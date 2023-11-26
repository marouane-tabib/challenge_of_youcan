<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary my-3 float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="col-form-label">Image:</label>
                        <!-- <input type="file" name="image" v-model="image" class="form-control" id="image"> -->
                        <input type="file" name="image" @change="handleFileUpload" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="product-name" class="col-form-label">Product Name:</label>
                        <input type="text" name="name" v-model="name" class="form-control" id="product-name" placeholder="Add Your Product Name">
                    </div>
                    <div class="mb-3">
                        <label for="description-text" class="col-form-label">Description:</label>
                        <textarea name="description" v-model="description" class="form-control" id="description-text"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="col-form-label">Category:</label>
                        <select name="category_id" v-model="category_id" id="category" class="form-control">
                            <option value="" disabled selected>Select Category</option>
                            <option v-for="category in categories" :value="category.id" :key="category.id">{{ category.name }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="col-form-label">Price:</label>
                        <input type="text" name="price" v-model="price" value=""  class="form-control" id="price" placeholder="Add Your Product Price">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" @click="productStore">Send</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: {},
                image: null,
                name: "",
                description: "",
                category_id: "",
                price: "",
            }
        },
        created() {
            axios.get('http://127.0.0.1:8000/api/categories')
                .then(response => this.categories = response.data)
                .catch(error => console.log(error));
        },
        methods: {
            handleFileUpload(event) {
                this.image = event.target.files[0];
            },
            productStore() {
                axios.post('http://127.0.0.1:8000/api/products', {
                    image: this.image,
                    name: this.name,
                    description: this.description,
                    category_id: this.category_id,
                    price: this.price,
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    if (response.data.error != undefined) {
                        alert(response.data.error);
                    } else {
                        window.location.reload();
                    }
                })
                .catch(error => console.log(error))
            },
        }
    }
</script>
