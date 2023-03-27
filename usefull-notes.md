## Blade Tempalte auth check

```html
    @auth
    {{auth()->user()->name}}
    @endauth

    @guest
    <p>Non-login</p>
    @endguest
```

---
