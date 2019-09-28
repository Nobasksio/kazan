import Vue from 'vue'

export function link (context, data) {

    Vue.bus.emit('someEvent');

    context.commit('link', data)
}

export function unlink (context, data) {

    context.commit('unlink', {entityType, entities, comId})
}

export function update (context, data) {

    context.commit('update', data)
}
