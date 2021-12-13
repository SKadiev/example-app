<template>
    <div>
        <h6 class="text-uppercase text-scondary font-weight-bolder">Check Avalibility</h6>
        <div class="form-row row pb-4">
            <div class="form-group col-md-6">
                <label for="from">From</label>
                <input v-model="from" type="text" name="from" class="form-control form-control-sm" placeholder="Start Date">
            </div>
             <div class="form-group col-md-6">
                <label for="to">To</label>
                <input v-model="to" type="text" name="to" class="form-control form-control-sm" placeholder="End Date">
            </div>
        </div>
        <button @click="check" @keyup.enter="check" type="button" class="btn btn-secondary col-12 pb-4">Check</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            to: null,
            from: '2019-11-08'
        }
    },

    methods: {
        check() {
            alert('Check');
        }
    }
}
</script>
<style scoped>
    label {
        font-size: 0.7rem;
        text-transform: uppercase;
        color: gray;
    }
</style>