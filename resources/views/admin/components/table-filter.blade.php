<div class="filter">
    <div class="filter-content">
        <div class="filter-header">
            <h2>Filtraje de tabla</h2>
        </div>
    
        <div class="table-filter-form">
            {{$slot}}
        </div>
    
        <div class="filter-footer">
            <div class="table-filter-button confirm-filter">
                <button>Aplicar filtro</button>
            </div>
            <div class="table-filter-button cancel-filter">
                <button>Cancelar filtro</button>
            </div>
        </div>
    </div>
</div>