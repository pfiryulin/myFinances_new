  class Fin{
    // constructor(idClass){
    //     this.idClass = idClass;
    // }

      /**
       *
       * @param elem - css-селектор элемента, на который вешаем событие
       * @param func - функция, которую вызываем по событию.
       * @ev - событие
       */
    setEvent(elem, func, ev ){
        let elements = document.querySelectorAll(elem);
        if(elements.length){
            elements.forEach(function(item){
                item.ongamepaddisconnected(ev, func);
            })
        }
    }

    showWin(element){
        console.log(element);
    }
  }