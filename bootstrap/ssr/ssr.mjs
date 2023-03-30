import { unref, useSSRContext, mergeProps, withCtx, createVNode, createTextVNode, createSSRApp, h } from "vue";
import { ssrRenderComponent, ssrRenderAttrs, ssrRenderList, ssrRenderClass, ssrInterpolate, ssrRenderAttr, ssrIncludeBooleanAttr } from "vue/server-renderer";
import { Head, Link, useForm, createInertiaApp } from "@inertiajs/vue3";
import { ArrowLongLeftIcon, ArrowLongRightIcon } from "@heroicons/vue/20/solid";
import { useToast } from "vue-toastification";
import createServer from "@inertiajs/vue3/server";
import { renderToString } from "@vue/server-renderer";
const _sfc_main$5 = {
  __name: "About",
  __ssrInlineRender: true,
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(unref(Head), { title: "About" }, null, _parent));
      _push(` About <!--]-->`);
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/About.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const __vite_glob_0_0 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$5
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$4 = {
  __name: "Paginate",
  __ssrInlineRender: true,
  props: ["next", "prev", "currentPage", "lastPage"],
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<nav${ssrRenderAttrs(mergeProps({ class: "flex items-center justify-between border-t border-gray-200 px-4 sm:px-0" }, _attrs))}><div class="-mt-px flex w-0 flex-1">`);
      _push(ssrRenderComponent(unref(Link), {
        href: __props.prev,
        class: [
          __props.prev === null ? "text-gray-300 cursor-default" : "text-gray-500 cursor-pointed hover:border-gray-300 hover:text-gray-700",
          "inline-flex items-center border-t-2 border-transparent pt-4 pr-1 text-sm font-medium"
        ]
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(ssrRenderComponent(unref(ArrowLongLeftIcon), {
              class: "mr-3 h-5 w-5 text-gray-400",
              "aria-hidden": "true"
            }, null, _parent2, _scopeId));
            _push2(` Previous `);
          } else {
            return [
              createVNode(unref(ArrowLongLeftIcon), {
                class: "mr-3 h-5 w-5 text-gray-400",
                "aria-hidden": "true"
              }),
              createTextVNode(" Previous ")
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div><div class="hidden md:-mt-px md:flex"><!--[-->`);
      ssrRenderList(__props.lastPage, (num) => {
        _push(`<a href="#" class="${ssrRenderClass(
          __props.currentPage == num ? "inline-flex items-center border-t-2 border-indigo-500 px-4 pt-4 text-sm font-medium text-indigo-600" : "inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
        )}">${ssrInterpolate(num)}</a>`);
      });
      _push(`<!--]--></div><div class="-mt-px flex w-0 flex-1 justify-end">`);
      _push(ssrRenderComponent(unref(Link), {
        href: __props.next,
        class: [
          __props.next === null ? "text-gray-300 cursor-default" : "text-gray-500 cursor-pointed hover:border-gray-300 hover:text-gray-700",
          "inline-flex items-center border-t-2 border-transparent pt-4 pl-1 text-sm font-medium"
        ]
      }, {
        default: withCtx((_, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(` Next `);
            _push2(ssrRenderComponent(unref(ArrowLongRightIcon), {
              class: "ml-3 h-5 w-5 text-gray-400",
              "aria-hidden": "true"
            }, null, _parent2, _scopeId));
          } else {
            return [
              createTextVNode(" Next "),
              createVNode(unref(ArrowLongRightIcon), {
                class: "ml-3 h-5 w-5 text-gray-400",
                "aria-hidden": "true"
              })
            ];
          }
        }),
        _: 1
      }, _parent));
      _push(`</div></nav>`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/components/Paginate.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {
  __name: "MonitorList",
  __ssrInlineRender: true,
  props: ["monitors"],
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><div class="pt-10"><div class="sm:flex sm:items-center"><div class="sm:flex-auto"><h1 class="text-base font-semibold leading-6 text-gray-900"> All your sites </h1><p class="mt-2 text-sm text-gray-700"> A list of all the users in your account including their name, title, email and role. </p></div><div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none"><button type="button" class="block rounded-md bg-indigo-600 py-2 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"> Add Site </button></div></div><div class="mt-8 flow-root"><div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8"><div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"><table class="min-w-full divide-y divide-gray-300"><thead><tr><th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"> Name </th><th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"> URL </th><th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"> Status </th><th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"> Role </th><th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0"><span class="sr-only">Edit</span></th></tr></thead><tbody class="divide-y divide-gray-200"><!--[-->`);
      ssrRenderList(__props.monitors.data, (monitor) => {
        _push(`<tr><td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">${ssrInterpolate(monitor.site_name)}</td><td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">${ssrInterpolate(monitor.site_url)}</td><td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">${ssrInterpolate(monitor.status)}</td><td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">${ssrInterpolate(monitor.role)}</td><td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"><a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, ${ssrInterpolate(monitor.name)}</span></a></td></tr>`);
      });
      _push(`<!--]--></tbody></table></div></div></div></div>`);
      _push(ssrRenderComponent(_sfc_main$4, {
        next: __props.monitors.next_page_url,
        prev: __props.monitors.prev_page_url,
        currentPage: __props.monitors.current_page,
        lastPage: __props.monitors.last_page,
        class: "mt-4"
      }, null, _parent));
      _push(`<!--]-->`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/components/home/MonitorList.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "Home",
  __ssrInlineRender: true,
  props: ["monitors"],
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(ssrRenderComponent(_sfc_main$3, mergeProps({ monitors: __props.monitors }, _attrs), null, _parent));
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Home.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const __vite_glob_0_1 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$2
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main$1 = {
  __name: "Login",
  __ssrInlineRender: true,
  setup(__props) {
    useToast();
    const form = useForm({
      email: "sarthak@bitfumes.com",
      password: "password"
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8" }, _attrs))}><div class="sm:mx-auto sm:w-full sm:max-w-md"><img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=600" alt="Your Company"><h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900"> Sign in to your account </h2></div><div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md"><div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10"><form class="space-y-6" action="#" method="POST"><div><label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label><div class="mt-2"><input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"${ssrRenderAttr("value", unref(form).email)}></div>`);
      if (unref(form).errors.email) {
        _push(`<small class="text-red-500">${ssrInterpolate(unref(form).errors.email)}</small>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div><label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label><div class="mt-2"><input id="password" name="password" type="password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"${ssrRenderAttr("value", unref(form).password)}></div>`);
      if (unref(form).errors.password) {
        _push(`<small class="text-red-500">${ssrInterpolate(unref(form).errors.password)}</small>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div><button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"${ssrIncludeBooleanAttr(unref(form).processing) ? " disabled" : ""}> Sign in </button></div></form></div></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Login.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const __vite_glob_0_2 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$1
}, Symbol.toStringTag, { value: "Module" }));
const _export_sfc = (sfc, props) => {
  const target = sfc.__vccOpts || sfc;
  for (const [key, val] of props) {
    target[key] = val;
  }
  return target;
};
const _sfc_main = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
  _push(`Hello`);
}
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Site/Create.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const Create = /* @__PURE__ */ _export_sfc(_sfc_main, [["ssrRender", _sfc_ssrRender]]);
const __vite_glob_0_3 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: Create
}, Symbol.toStringTag, { value: "Module" }));
createServer(
  (page) => createInertiaApp({
    page,
    render: renderToString,
    resolve: (name) => {
      const pages = /* @__PURE__ */ Object.assign({ "./Pages/About.vue": __vite_glob_0_0, "./Pages/Home.vue": __vite_glob_0_1, "./Pages/Login.vue": __vite_glob_0_2, "./Pages/Site/Create.vue": __vite_glob_0_3 });
      return pages[`./Pages/${name}.vue`];
    },
    setup({ App, props, plugin }) {
      return createSSRApp({
        render: () => h(App, props)
      }).use(plugin);
    }
  })
);
