export function load (state) {

    return (entityType, entityId, def = null) => {

        return state.entities[entityType][entityId] ? state.entities[entityType][entityId].data : def;

    }
}

export function load_multiple (state) {

    return (entityType, entityIds, indexed) => {

        let result = indexed ? {} : [];

        for (let i = 0; i < entityIds.length; i++) {

            let entityId = entityIds[i]

            if (state.entities[entityType][entityId] && state.entities[entityType][entityId].data) {

                indexed ?  result[entityId] = state.entities[entityType][entityId].data : result.push(state.entities[entityType][entityId].data)
            }
        }

        return result;
    }
}


export function socketable (state) {

    return (entityType, entityIds) => {

        let result = {};

        for (let i = 0; i < entityIds.length; i++) {

            let entityId = entityIds[i]

            if (state.entities[entityType][entityId] && state.entities[entityType][entityId].data)
                result[entityId] = state.entities[entityType][entityId].data
        }

        return result;
    }
}
