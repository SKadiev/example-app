<template>
    <div class="row">
        <div class="col-12 row" v-if="error">
            Uknown error has occured, please try again later
        </div>
        <div  class="row" v-else>

        <div :class="[{'col-md-4' : twoColumns}, {'d-none' : oneColumn}]">
            <div class="card">
                <div class="body">
                    <div v-if="loading">
                        Loading ...
                    </div>
                    <div v-if="hasBooking">
                       <p>Stayed at 
                           <router-link :to="{name: 'bookable', params: {id: booking.bookable.bookable_id}}">
                               {{ booking.bookable.title }}
                           </router-link></p> 
                       <p>{{booking.from}} to {{booking.to}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div :class="[{'col-md-8' :twoColumns}, {'col-md-12' : oneColumn}]">

            <div v-if="loading">Loading</div>
            <div v-else>

                <div v-if="alreadyReviewed">
                    <h3>You've already left a review for this booking</h3>
                </div>
                <div v-else>
                    <div class="form-group">
                        <label class="text-muted">Select the star rating (1 is worst - 5 is best)</label>
                        <star-rating
                            class="fa-3x"
                            v-model="review.rating">
                        </star-rating>
                    </div>
                    <div class="form-group">
                        <label for="content" class="text-muted">Describe your expirience with</label>
                        <textarea
                        v-model="review.content"
                        name="content"
                        cols="30"
                        rows="10"
                        class="form-control"
                        ></textarea>
                    </div>
                    <button :dsabled="loading" @click.prevent="submit" class="btn btn-lg btn-primary w-100 mt-2">Submit</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import {is404} from './../shared/components/utils/response';
export default {
    data() {
        return {
            review: {
                id : null,
                rating: 5,
                content: null
            },
            existingReview: null,
            loading: false,
            booking: null,
            error: false
        }
    },
    created() {
        this.review.id = this.$route.params.id;
        this.loading = true;
        axios.get(`/api/reviews/${this.review.id}`).
            then((result) => {
                this.existingReview = result.data.data;
            }
            ).catch((err) => {

                if (is404(err)) {
                    return axios.get(`/api/booking-by-review/${this.review.id}`)
                    .then(result => {
                        this.booking = result.data.data;
                    }).
                    catch(err => {
                        this.error = !is404(err);
                    });
                } 

            this.error = true;
                
            }).then((response) => {
                this.loading = false;

            });
    },
    computed: {
        alreadyReviewed() {
            return this.hasReview || !this.booking;
        },
        hasReview() {
            return this.existingReview !== null;
        },
        hasBooking() {
                return this.booking !== null;
        },
        oneColumn() {
            return  !this.loading && this.alreadyReviewed;
        },
        twoColumns() {
            return  this.loading && !this.alreadyReviewed;

        }
    },
    methods: {
        submit() {
            this.loading = true;
            axios.post('/api/reviews', this.review)
            .then(response => console.log(response))
            .catch(err => {
                this.error = err;
            })
            .then(() => {
                this.loading = false; 
            })
        }
    },
}
</script>