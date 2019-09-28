import Vue from 'vue'


export function syncDs (context, data) {

    context.commit('updateDs', data)

    axios('/api/datasource/rest/state')
        .then(response => {
            context.commit('updateDs', response.data)
        })
        .catch(error => {

        })
}
