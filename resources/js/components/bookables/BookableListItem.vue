<template>
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title">
                 <router-link :to="{ name : 'bookable', params: {id}}">{{ title }}</router-link>
            </h5>
            <p class="card-text">{{content}}</p>
           
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'title': String,
        'content' : String,
        'id' : Number
    } 
}
</script>