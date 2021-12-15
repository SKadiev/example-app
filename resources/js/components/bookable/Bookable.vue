<template>
    <div>
        <div v-if="loading">
             Data is loading
        </div>
        <div v-else>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                           <h2>{{bookable.title}}</h2>
                           <hr />
                           <article>{{bookable.content}}</article>  
                        </div>
                    </div>  
                    <review-list></review-list>     
                </div>
                <div class="col-md-4 pb-4">
                    <avaliability></avaliability>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Avaliability from './Avaliability.vue';
import ReviewList from './ReviewList.vue';
export default {

    components: {
        Avaliability,
        ReviewList
    },

    data() {
        return {
            loading: false,
            bookable: null
        }
    },

    created() {
        this.loading = true;
        const bookableIdentifier = this.getSingleBookableUrl();
        if (bookableIdentifier) {
            axios.get("/api/bookables/" + bookableIdentifier)
                .then(result => result.data.data)
                .then(data => this.bookable = data)
                .then(() => this.loading = false)
                .catch(err => {
                    alert('Not item with this id');
                    this.$router.go(-1);

                });
        }
    },

    methods: {
        getSingleBookableUrl() {
            return this.$route.params.id ?? null;
        }

    }
   

    
}

</script>