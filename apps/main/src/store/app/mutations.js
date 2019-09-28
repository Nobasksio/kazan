import Vue from 'vue'

export function link(state, {entityType, entities, socketable, comId}) {

    for (let entityId in entities) {

        if (!state.entities[entityType][entityId]) {

            Vue.set(state.entities[entityType], entityId, {
                data: entities[entityId],
                components: [comId],
                socketable: socketable
            })

        } else {

            if (state.entities[entityType][entityId].components.indexOf(comId) < 0)
                state.entities[entityType][entityId].components.push(comId);
        }
    }
}


export function unlink(state, {entityType, entities, comId}) {

    for (let i = 0; i < entities.length; i++) {

        let entityId = entities[i];

        if (state.entities[entityType][entityId]) {

            let remove = false;

            if (comId) {

                let clist = state.entities[entityType][entityId].components

                if (clist) {

                    let foundIndex = clist.indexOf(comId);

                    if (foundIndex > -1) {
                        clist.splice(foundIndex, 1)
                    }

                    if (!clist.length) {
                        remove = true;
                    }

                } else {

                    remove = true;
                }

            } else {

                remove = true;
            }

            if (remove) {
                Vue.delete(state.entities[entityType], entityId);
            }
        }

    }

}

export function update(state, {entityType, entities}) {

    for (let entityId in entities) {

        if (state.entities[entityType]) {

            Vue.set(state.entities[entityType].data, entities[entityId])
        }
    }
}
